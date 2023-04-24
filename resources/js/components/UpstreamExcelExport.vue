<template>

     <a :href="href" :download="download" class="btn btn-sm btn-icon btn-inverse btn-round pull-right" 
     style="border:thin line black; background:#396; color:#fff; margin-right: 5px"><i class="fa fa-file-excel-o"> Download Data</i>  </a>

</template>

<script>
  export default 
  {
   
    props:[
       'data',
       'fields',
       'api',
       'excelStyle',
       'file_name'
    ],

    data()
    { 
         
         return {
              href:'',
              download:'',
              text:'Loading ... '
         }

    },

    watch:{
       data(n, o)
       {
          this.exportToCsv();
       }  
    },

    mounted()
    {
      this.exportToCsv();
    },

    methods: {

         convertJsonToCsv(args)
         {
            var result, ctr, keys, columnDelimiter, lineDelimiter, data;

            data = args.data || null;
            if (data == null || !data.length) 
            {
                return null;
            }

            columnDelimiter = args.columnDelimiter || ',';
            lineDelimiter = args.lineDelimiter || '\n';

            keys = Object.keys(data[0]);

            result = '';
            result += keys.join(columnDelimiter);
            result += lineDelimiter;

            data.forEach(function(item) 
            {
                ctr = 0;
                keys.forEach(function(key) 
                {
                    if (ctr > 0) result += columnDelimiter;

                    result += item[key];
                    ctr++;
                });
                result += lineDelimiter;
            });

            return result;

         },  
         
         exportToCsv()
         {

            var data, filename, link;

            var csv = this.convertJsonToCsv(
            {
                data: this.data
            });

            if (csv == null) return;

            filename = this.file_name + '.csv';

            var blob = new Blob([csv], {type: "text/csv;charset=utf-8;"});

            if (navigator.msSaveBlob)
            { // IE 10+ 
               navigator.msSaveBlob(blob, filename) 
            }
            else
            {
                var url = URL.createObjectURL(blob);
                this.href = url;
                this.download = filename;
                this.text = 'Export To Excel';
            }

         }

    }
    
}
</script>