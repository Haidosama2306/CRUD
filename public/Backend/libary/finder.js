(function($){
    var $document = $(document)
    var HT={}
    
    HT.uploadImageToInput=()=>{
        $(document).on('click','.upload-image',function(){
            let input = $(this)
            let type = input.attr('data-type')
            HT.setupCkfinder3(input,type)
        })
    }

    HT.setupCkfinder3=(object, type)=>{
        if(typeof(type)=='undefined'){
            type='Images'
        }
        var finder = new CKFinder()
        finder.resourceType = type
        finder.selectActionFunction = function(fileUrl, data){
            object.val(fileUrl)
        }
        finder.popup()
    }

    $document.ready(function(){
        HT.uploadImageToInput()
    })
    
})(jQuery)