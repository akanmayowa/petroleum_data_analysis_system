<style>
    .p-3
    {
        padding: 10px 0px !important;
    }
</style>

<template>
 <span>({{ status }})</span>
</template>


<script>


    export default
    {
     
     data(){
         return {
             version:'1.0',
             status:''
         }
     },

     created(){
          this.checkAuth();


     },

     mounted()
     {


     },

     methods:{
        
        checkAuth()
        {
            setTimeout(()=>{

                // alert('ok....');
                this.axios.get('/check-auth').then((response)=>{
                
                if (response.error)
                {
                    alert('Please login!');
                    location.reload().href="http://localhost:8000/";
                    // this.checkAuth();
                }
                else
                {
                    // alert('seen');
                    console.log('Logged',response);
                    this.status = 'Logged';
                    this.checkAuth();
                }

        }).catch((error)=>{
            alert('error')
        })


                

            },600000);

        }



     }




    };


</script>

