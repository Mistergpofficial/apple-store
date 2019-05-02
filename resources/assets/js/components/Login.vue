<template>
    <div>
        <div class="sign-overlay"></div>
        <div class="signpanel"></div>

        <div class="panel signin">
            <div class="panel-heading">
                <h1><a :href="`http://localhost/newartisan`"><img :src="`http://localhost/newartisan/images/logo.png`" width="120" height="56"></a></h1>
                <h4 class="panel-title">Welcome! Please signin.</h4>
            </div>
            <div class="panel-body">
                <!--    <button class="btn btn-primary btn-quirk btn-fb btn-block">Connect with Facebook</button>
                    <div class="or">or</div>-->
                <p class="help is-danger" style="color: red;">{{ getLoginError('message') }}</p>
                <form @submit.prevent="login()" @keydown="clear($event.target.name)">
                    <div class="form-group mb10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="email" name="email" v-model="loginData.email" class="form-control" placeholder="Enter Email">
                        </div>
                        <p class="help is-danger" style="color: red;">{{ getLoginError('email') }}</p>
                    </div>
                    <div class="form-group nomargin">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" v-model="loginData.password" class="form-control" placeholder="Enter Password">
                        </div>
                        <p class="help is-danger" style="color: red;">{{ getLoginError('password') }}</p>
                    </div>
                    <div><a :href="`http://localhost/newartisan/password/reset`" class="forgot">Forgot password?</a></div>
                    <div class="form-group">
                        <button class="btn btn-success btn-quirk btn-block">Sign In</button>
                    </div>
                </form>
                <hr class="invisible">
                <div class="form-group">
                    <a :href="`http://localhost/newartisan/auth/register`" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Not a member? Sign up now!</a>
                </div>
            </div>
        </div><!-- panel -->

    </div>
</template>



<script>
    export default {
        data () {
            return {
                loginData: {
                    email: '',
                    password: ''
                },
                errors: {}

            }
        },
        methods: {
            login(){

                this.loggingIn = true;

                // Make a post request for a user to login
                this.$http.post(   `${Laravel.appUrl}/login` , this.loginData)
                    .then(function (response) {
                        console.log(response);
                        window.location = `${Laravel.appUrl}/user/dashboard`

                    })
                    .catch( (error) => {
                        this.loggingIn = false ;
                        // console.log(error);
                        this.errors = error.body.errors || error.body ;
                    });

            },
            getLoginError(field){

                if (this.errors.hasOwnProperty(field) ){
                    if ( typeof this.errors[field] === "object" ) return this.errors[field][0];

                    if ( typeof this.errors[field] === "string" ) return this.errors[field];
                }

            },
            clear(field) {
                delete this.errors[field];
            },

            any() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>