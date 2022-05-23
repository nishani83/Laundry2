
$(document).ready( 
        function() {
           /*Begins Data table for order history filter grid*/  
          console.log('hello')
       var otable = $('#tbOrderHistory').DataTable( {
          "responsive": true,
          "pagingType": "input",
            "sDom": '<"top"i>rt<"bottom"flp><"clear">',
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            
            "language": {
                "lengthMenu": "Rows per page _MENU_",
                "zeroRecords": "Nothing found - sorry",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "(filtered from _MAX_ total records)",
                paginate: {
                    next: '<i class="fa fa-fw fa-angle-right">',
                    previous: '<i class="fa fa-fw fa-angle-left">',
                    "sFirst": "",
                    "sLast": "",
                   
                  },
            },
            "columnDefs": [
                { "targets": [ 7 ],"visible": true, "searchable": false },
                { "targets": [ 4 ],
                    "render": function ( d, type, row ) {
                        return '<span class="text-ellipsis" title="' + d + '">' + d + '</span>';
                  }
                }
                
            ],
            "order": [[ 2, "desc" ]],
            "stripeClasses": [ 'odd-row', 'even-row' ],
            "drawCallback": function () {
              $(".paginate_input").focus(function() { $(this).select(); } );
            }
        });
            var tbOrderHistory = $("#tbOrderHistory").DataTable();
          var response=myData;
              numberOfResults = response.data.length;
	            var orderList = $("#tbOrderHistory").DataTable();
	            orderList.clear();
              orderList.rows.add(response.data).draw();
        });