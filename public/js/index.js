// var app = new Vue({
//     el: '#pasteForm',
//     data: {
//       title: "",
//       code: ""
//     },
//     methods: {
//         request_paste: function(e){
//             var data = {
//                 title: this.title,
//                 code: this.code,
//             }
//             axios({
//                 method: 'post',
//                 url: '/',
//                 data: data,
//                 headers: {'Content-Type': 'application/json' }
//             })
//             .then(function (response) {
//                 console.log(response.data)
//             })
//             .catch(function (response) {
//                 console.log(response.error)
//             });
//         }
//     }
// })

catchTab = function(t, e){
    if(e.code == "Tab"){
        t.value+="	"  
        return false;
    }
}