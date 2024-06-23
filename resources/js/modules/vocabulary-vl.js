import serviceHTTP from "../service/serviceHTTP.js";
import Swal from 'sweetalert2'
// import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

Vue.createApp({
    data(){
        return {
            author: 'Phạm Minh Châu',
            formData: {
                unit: '1',
                vietnamese: '',
                japanese: '',
                wrongAnswer1: '',
                wrongAnswer2: '',
                wrongAnswer3: '',
                image: ''
            }
        }
    },
    methods: {
        storeVocabulary(){
            console.log(this.formData)
        }
    },
    mounted(){
    },
    components: {
    }
}).mount('#ctlVocabulary');
