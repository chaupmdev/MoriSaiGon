import serviceHTTP from "../service/serviceHTTP.js";
import Swal from 'sweetalert2'
// import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

Vue.createApp({
    data(){
        return {
            author: 'Phạm Minh Châu',
            formData: {
                course: '1',
                vietnamese: '',
                japanese: '',
                wr_answer1: '',
                wr_answer2: '',
                wr_answer3: '',
                image: '',
                imageUpload: null
            },
            resetFormData: {
                course: '1',
                vietnamese: '',
                japanese: '',
                wr_answer1: '',
                wr_answer2: '',
                wr_answer3: '',
                image: '',
                imageUpload: null
            },
            formError: {},
        }
    },
    methods: {
        handleReset(){
            this.formData = {...this.resetFormData}
            this.$refs.inputFile.value = null;
            this.formError= {}
        },
        storeVocabulary(){
            var that = this
            serviceHTTP.post('/admin/api/vocabulary/store', {...that.formData}).then((response) => {
                if(response.status == 200)
                {
                    $('#staticBackdrop').modal('hide');
                    that.handleReset();
                    Swal.fire({
                        title: "Thành công!",
                        text: "Đã thêm thông tin mới!",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                      });
                }else{
                    that.formError = {...response.message}
                }
            })
        },
        previewFiles(event) {
            const fileInput = event.target
            const fileName = fileInput.files[0].name

            let that = this
            let reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            reader.onload = function () {
                that.formData['imageUpload'] = reader.result;
            };

            this.formData['image'] = URL.createObjectURL(event.target.files[0]);
        },
    },
    mounted(){
    },
    components: {
    }
}).mount('#ctlVocabulary');
