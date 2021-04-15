<template>
    <el-row :gutter="24" class="mt-5 father">
        <el-col :span="8" :xl="8" :lg="8" :md="6" :sm="6" :xs="2">
            <p class="space">space</p>
        </el-col>
        <el-col :span="8" :xl="8" :lg="8" :md="12" :sm="12" :xs="22">
            <el-card>
                    <div slot="header">
                        <div class="logo-container">
                            <img src="/images/logos/logo.PNG" class="logo-login">
                        </div>
                    </div>
                <el-form ref="form" :model="form" label-position="top" label-width="120px">
                    <el-col :span="24">
                        <el-form-item label="Correo Electrónico">
                            <el-input placeholder="Escribe aqui tu correo electronico" v-model="form.email"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="24">
                        <el-form-item label="Contraseña">
                            <el-input placeholder="Escribe aqui tu Contraseña" v-model="form.password" type="password"
                                      autocomplete="off"></el-input>
                        </el-form-item>
                    </el-col>
                </el-form>
                <el-col :span="24">
                    <span v-if="Object.entries($page.props.auth.errors).length!==0">
                        <el-alert type="error"
                                  :closable="false"
                                  effect="dark">{{ $page.props.auth.errors[0][0] }}
                        </el-alert>
                    </span>
                </el-col>
                <el-col :span="24" class="mb-1 mt-1">
                    <el-button type="primary" icon="fas fa-sign-in-alt" @click="login"> Iniciar sesión</el-button>
                </el-col>
            </el-card>
        </el-col>
        <el-col :span="8" :xl="8" :lg="8" :md="6" :sm="6" :xs="2">
            <p class="space">space</p>
        </el-col>
    </el-row>

</template>
<script>
export default {
    data() {
        return {
            loading: false,
            users: [],
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            this.$refs.form.validate((valid) => {
                if (valid) {
                    this.loading=true;
                    this.$inertia.post('/login',{
                        email:this.form.email,
                        password: this.form.password
                    })
                } else {
                    return false;
                }
            });
        }
    },
    mounted() {
        if (this.$page.props.users) {
            this.users = this.$page.props.users
        }
    }
}

</script>
