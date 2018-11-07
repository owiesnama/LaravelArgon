<script>
    import Cleave from 'vue-cleave'
    import 'cleave.js/dist/addons/cleave-phone.sd'
    export default{
        props: ['initialUserInfo'],

        components: {Cleave},

        data(){
            return {
                cleaveOptions: {
                    phone: true,
                    phoneRegionCode: 'sd'
                },
                avatarEdit:false,
                avatar: {},
                user: this.initialUserInfo,
                profileForm: new Form(this.initialUserInfo.profile)
            }
        },

        methods: {
            /**
             *  send a request to update
             *  user profile
             */
            update(){
                this.profileForm.patch('/profile')
                    .catch(error => console.log(error))
            },
            /**
             * toggle avatar editing status
             */
            toggleAvatarEdit(){

                this.avatarEdit = ! this.avatarEdit
            }

        },

        mounted(){
            this.$refs.cleave.$refs.input.classList.add('form-control')
        },

    }
</script>
