<template>
    <div>
        <div class="sign-overlay"></div>
        <div class="signpanel"></div>

        <div class="signup">
            <div class="row">
                <div class="col-sm-5">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1><a :href="`http://localhost/newartisan`"><img :src="`http://localhost/newartisan/images/logo.png`" width="120" height="56"></a></h1>
                            <h4 class="panel-title">Create an Account!</h4>
                        </div>
                        <div class="panel-body">
                            <a :href="`http://localhost/newartisan/login/facebook`" class="btn btn-primary btn-quirk btn-fb btn-block">
                                Sign Up Using Facebook
                            </a>
                              <div class="or">or</div>
                            <div class="alert alert-success" v-if="submitted">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                                Registration is Successful
                            </div>
                            <form @submit.prevent="signup()" @keydown="clear($event.target.name)">
                                <div class="form-group mb15">
                                    <input type="text" name="full_name" v-model="signupData.full_name" class="form-control" placeholder="Enter Your Full Name">
                                    <p class="help is-danger" style="color: red;">{{ getSignupError('full_name') }}</p>
                                </div>
                                <div class="form-group mb15">
                                    <input type="text" name="username" v-model="signupData.username" class="form-control" placeholder="Enter Your Username">
                                    <p class="help is-danger" style="color: red;">{{ getSignupError('username') }}</p>
                                </div>
                                <div class="form-group mb15">
                                    <input type="email" name="email" v-model="signupData.email" class="form-control" placeholder="Enter Your Email">
                                    <p class="help is-danger" style="color: red;">{{ getSignupError('email') }}</p>
                                </div>
                                <div class="form-group mb15">
                                    <input type="password" name="password" v-model="signupData.password" class="form-control" placeholder="Enter Your Password">
                                    <p class="help is-danger" style="color: red;">{{ getSignupError('password') }}</p>
                                </div>
                                <div class="form-group mb15">
                                    <input type="password" name="password_confirmation" v-model="signupData.password_confirmation" class="form-control" placeholder="Enter Your Password Again">
                                    <p class="help is-danger" style="color: red;">{{ getSignupError('password_confirmation') }}</p>
                                </div>

                                <div class="form-group mb20">
                                    <label class="ckbox">
                                        <input type="checkbox" name="checkbox" checked>
                                        <span>Accept terms and conditions</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-quirk btn-block">Create Account</button>
                                    <a :href="`http://localhost/newartisan/auth/login`" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Already a member? Sign In Now!</a>
                                </div>
                            </form>
                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-sm-5 -->
                <div class="col-sm-7">
                    <div class="sign-sidebar">

                        <img :src="`http://localhost/newartisan/images/1.jpg`" />
                        <hr class="invisible">

                        <div class="form-group">
                            <a :href="`http://localhost/newartisan/auth/login`" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Already a member? Sign In Now!</a>
                        </div>
                    </div><!-- sign-sidebar -->
                </div>
            </div>
        </div><!-- signup -->

    </div>
</template>


<script>
    export default {
        data () {
            return {
                signupData: {
                    full_name: '',
                    username: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors : {},
                submitted: false
            }
        },
        methods: {
            signup(){

                this.signingUp = true ;
                // console.log(this.signingUp);
                // Make a post request for a user to login
                this.$http.post(  `${Laravel.appUrl}/auth/register` , this.signupData)
                    .then(function (response) {
                        this.submitted = true;
                        this.signupData = ""
                        //window.location = url + 'auth/login'
                    })
                    .catch( (error) =>  {
                        // console.log(error);
                        this.signingUp = false ;
                        this.errors = error.body.errors || error.body ;

                    });
            },
            getSignupError(field){

                if (this.errors.hasOwnProperty(field) ) {



                    if (typeof this.errors[field] === "object") {

                        return this.errors[field][0];
                    }

                    if ( typeof this.errors[field] === "string" ) {

                        return this.errors[field]

                    }



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