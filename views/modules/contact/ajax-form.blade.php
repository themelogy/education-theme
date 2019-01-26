<div id="contact_form" class="m-t-md-30">
    <h3 class="title">{{ trans('themes::contact.write us') }}</h3>
    <p>{{ trans('themes::contact.write us desc') }}</p>

    <div class="alert alert-success" role="alert" v-show="success">
        @{{ successMessage }}
    </div>

    {!! Form::open(['v-on:submit'=>'submitForm', 'class' => 'contact-form', 'method'=>'post', 'v-show'=>'!success']) !!}
    {!! Form::hidden('from', Request::path()) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="first_name" value="" placeholder="{{ trans('contact::contacts.form.first_name') }}" class="form-control form-control-sm" v-model="input.first_name" :class="{ 'is-invalid' : hasError('first_name') }" />
                <div v-for="error in errors.first_name" class="help-block red-text">@{{ error }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="last_name" value="" placeholder="{{ trans('contact::contacts.form.last_name') }}" class="form-control form-control-sm" v-model="input.last_name" :class="{ 'is-invalid' : hasError('last_name') }"/>
                <div v-for="error in errors.last_name" class="help-block red-text">@{{ error }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="phone" value="" placeholder="{{ trans('contact::contacts.form.phone') }}" class="form-control form-control-sm" v-model="input.phone" :class="{ 'is-invalid' : hasError('phone') }"/>
                <div v-for="error in errors.phone" class="help-block red-text">@{{ error }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="email" value="" placeholder="{{ trans('contact::contacts.form.email') }}" class="form-control form-control-sm" v-model="input.email" :class="{ 'is-invalid' : hasError('email') }"/>
                <div v-for="error in errors.email" class="help-block red-text">@{{ error }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <textarea name="enquiry" class="form-control form-control-sm materialize-textarea" placeholder="{{ trans('contact::contacts.form.enquiry') }}" rows="3" v-model="input.enquiry" :class="{ 'is-invalid' : hasError('enquiry') }"></textarea>
                <div v-for="error in errors.enquiry" class="help-block red-text">@{{ error }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Captcha::image('captcha_contact') !!}
            <div class="help-block red-text" style="display: block !important;" v-if="hasError('captcha_contact')">@{{ getError('captcha_contact') }}</div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="waves-effect waves-light btn submit-button brang-bg mt-30 pull-right">{{ trans('global.buttons.send') }}</button>
        </div>
    </div>

    {!! Form::close() !!}
</div>

@push('scripts')
<script src="{!! Module::asset('contact:js/vue/vue.js') !!}"></script>
<script src="{!! Module::asset('contact:js/vue/axios.min.js') !!}"></script>
<script src="{!! Module::asset('contact:js/vue/loadingoverlay.min.js') !!}"></script>
@endpush

@push('js_inline')
    <script>
        @if(App::environment()=='local')
            Vue.config.devtools = true;
        @endif
            window.axios.defaults.headers.common['X-CSRF-TOKEN']     = '{{ csrf_token() }}';
        window.axios.defaults.headers.common['Cache-Control']    = 'no-cache';
        new Vue({
            el: '#contact_form',
            data: {
                input: {
                    first_name: '',
                    last_name: '',
                    phone: '',
                    email:'',
                    enquiry: '',
                    captcha_contact: ''
                },
                errors: {},
                success: false,
                successMessage: ''
            },
            methods: {
                submitForm: function (e) {
                    e.preventDefault();
                    this.success = false;
                    this.input.captcha_contact = grecaptcha.getResponse(captcha_contact);
                    this.ajaxStart(true);
                    axios.post('{{ route('api.contact.send') }}', this.$data.input)
                        .then(response => {
                            this.successMessage = response.data.message;
                            this.success = true;
                            this.resetForm();
                            this.ajaxStart(false);
                        })
                        .catch(error => {
                            this.errors = error.response.data;
                            this.success = false;
                            this.ajaxStart(false);
                            grecaptcha.reset(captcha_contact);
                        });
                },
                getError: function (field) {
                    if(this.errors[field]) {
                        return this.errors[field][0];
                    }
                },
                hasError: function (field) {
                    if(this.errors[field]) {
                        return true;
                    }
                    return false;
                },
                resetForm: function () {
                    var self = this;
                    Object.keys(this.$data.input).forEach(function(key, index){
                        self.$data.input[key] = '';
                    });
                },
                ajaxStart: function (loading) {
                    if (loading) {
                        $('form', this.$el).LoadingOverlay("show",{
                            zIndex: 10
                        });
                    } else {
                        $('form', this.$el).LoadingOverlay("hide",{
                            zIndex: 10
                        });
                    }
                }
            }
        });
    </script>
    {!! Captcha::setLang(locale())->scriptWithCallback(['captcha_contact']) !!}
@endpush
