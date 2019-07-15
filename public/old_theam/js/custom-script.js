$(document).ready(function(){
    var ajaxUrl = "ajax.php";

    $('.dropify').dropify({
        messages: {
            'default': 'Glissez et déposez un fichier ici OU cliquez ici',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });

    $('#data-table-menu').DataTable({
        "bFilter" : false,               
        "bLengthChange": false
    });


	var updateNestedMenu = function(e){
        var list   = e.length ? e : $(e.target),
        changedData = window.JSON.stringify(list.nestable('serialize'));
        $.ajax({
        	url: ajaxUrl,
        	data: {
        		flag: "updateNestedMenu",
        		changedData: changedData
        	},
        	type: "POST",
        	success: function(result){
	        	//console.log(result);
	    	}
		});
    };
    $('#menu-list').nestable({
        maxDepth: 3
    }).on('change', updateNestedMenu);


    var slider = $('#data-table-slider').DataTable({
        "bFilter" : false,               
        "bLengthChange": false,
        "rowReorder": true,
        "bPaginate": false,
    });
     
    slider.on( 'row-reorder', function ( e, diff, edit ) {
        var result = 'Reorder started on row: '+edit.triggerRow.data()[1]+'<br>';
        var jsonData = {};
        for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
            var rowData = slider.row( diff[i].node ).data();
            var id = rowData[1];
            jsonData[id] = diff[i].newData;
        }
        $.ajax({
            url: ajaxUrl,
            data: {
                flag: "updateSlierOrder",
                changedData: JSON.stringify(jsonData)
            },
            type: "POST",
            success: function(result){
                //console.log(result);
            }
        });
    } );
    
    
    $( "#type_of_template" ).change(function() {
            var pageT = $( "#type_of_template" ).val();
            
            $('#row_img1').addClass('hide');
            $('#row_img2').addClass('hide');
            
            if(pageT ==1) {
                $('#label_img1').html('Top Left Image (Height x Width)');
            } else if(pageT ==2) {
                $('#label_img1').html('Top Right Image (Height x Width)');
            } else if(pageT ==3) {
                $('#label_img1').html('Top Image (Height x Width)');
            } else if(pageT ==4) {
                $('#label_img1').html('Bottom Image (Height x Width)');
            } else if(pageT ==5) {
                $('#label_img1').html('Top Right Image (Height x Width)');
                $('#label_img2').html('Bottom Left Image (Height x Width)');
            } 
            
            if(pageT ==1 || pageT ==2 || pageT ==3 || pageT ==4){
               $('#row_img1').removeClass('hide'); 
            } else if(pageT ==5){
               $('#row_img1').removeClass('hide'); 
               $('#row_img2').removeClass('hide'); 
            }
            
            
    });
    
    $("#page_title").bind("keyup change", function(e) {
        var page_title = $("#page_title").val();
        var page_url = page_title.trim().replace(/[^a-z0-9]+/gi, '-');
        $('#page_url').val(page_url.toLowerCase());
        $('#label_url').addClass('active');
    })
	
	$("#news_title").bind("keyup change", function(e) {
        var news_title = $("#news_title").val();
        var news_url = news_title.trim().replace(/[^a-z0-9]+/gi, '-');
        $('#news_url').val(news_url.toLowerCase());
        $('#label_url').addClass('active');
    })
});

var app = angular.module('materializeApp', ['ui.materialize'])
    .controller('BodyController', ["$scope", function ($scope) {
    }])
    .controller('DateController', ["$scope", function ($scope) {
        
        var currentTime = new Date();
        $scope.currentTime = currentTime;
        $scope.month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $scope.monthShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $scope.weekdaysFull = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $scope.weekdaysLetter = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
        //$scope.disable = [false, 1, 7];
        $scope.today = 'Today';
        $scope.clear = 'Clear';
        $scope.close = 'Close';
        var days = 15;
        //$scope.minDate = (new Date($scope.currentTime.getTime() - ( 1000 * 60 * 60 *24 * days ))).toISOString();
        //$scope.maxDate = (new Date($scope.currentTime.getTime() + ( 1000 * 60 * 60 *24 * days ))).toISOString();
        
    }]);
    