/*
Author: sike
Author URI: http://codecanyon.net/user/sike?ref=sike
*/
jQuery(document).ready(function($) {
    var _content = '<li class="content-item">Icon (optional):<input type="text" class="tiny-text widefat" name="cq_expandmenu_item[icon]" data-name="cq_expandmenu_item[icon]" autocomplete="off" value="fa-user" /> Menu text:<input type="text" class="small-text widefat" name="cq_expandmenu_item[menutext]" data-name="cq_expandmenu_item[menutext]" autocomplete="off" value="The menu text here" /> Link:<input type="text" class="large-text widefat" name="cq_expandmenu_item[link]" data-name="cq_expandmenu_item[link]" autocomplete="off" value="http://codecanyon.net/user/sike/" /></li>';
    var _textItem = '<input type="text" class="item-text widefat" name="cq_expandmenu_item[text]" data-name="cq_expandmenu_item[text]" value="" /><a class="remove-text" href="#" title="Remove this text"></a>';
    $('#add-content').on('click', _uploadThumbs);

    var media_frame, _currentInput;

    function _uploadThumbs(event){
        event.preventDefault();
        // _btnContainer = $(this).prev('.image-item-container');
        _btnContainer = $(this).parent().find('.image-item-container');
        var _contentTemplate = $(_content).clone(true);
        _contentTemplate.insertAfter($('#cq-expandmenu-admin-container').find('li').last());
        _enableAddItem();
        _resetItemName();
        return false;
    }


    _enableAddItem();
    function _enableAddItem(){

        $('.add-item-text').off('click');
        $('.add-item-text').on('click', function(event) {
            var _itemContainer = $(this).parent().find('.item-container');
            // var _itemContainer = $(this).prev('.item-container');
            _itemContainer.append($(_textItem).clone(true));
            _resetItemName();
            return false;
        });
    }

    function _resetItemName(){
        jQuery('.content-item').each(function(index) {
            var _item = $(this);
            $(this).find('input').each(function() {
                var _name = $(this).data('name')+'['+index+'][]';
                $(this).attr('name', _name);
            })

        });
        _enableSort();
        _enableRemove();
    }

    function _uploadImage(event){
        if ( media_frame ) {
            media_frame.remove();
        }
        var _from = event.data.from;
        media_frame = wp.media.frames.media_frame = wp.media({
            className: 'media-frame media-frame',
            frame: 'select',
            multiple: false,
            title: 'Choose Image',
            library: {
                type: 'image'
            },
            button: {
                text:  'Use the image'
            }
        });

        _currentInput = jQuery(event.target).prev('input');
        media_frame.on('select', function(){
            var media_attachment = media_frame.state().get('selection').first().toJSON();
            _currentInput.val(media_attachment.url);
            if(_from=="thumb")_currentInput.parent().find('.preview').attr('src', media_attachment.url);
        });

        media_frame.open();
        return false;
    }

    _resetItemName();

    function _enableRemove(){
        jQuery('.remove-text').on('click', function(event) {
            event.preventDefault();
            $(this).prev('input').animate({
                opacity: 0},
                300, function() {
                    $(this).remove();
                    _resetItemName();
            });
            $(this).remove();
            return false;
        });
        jQuery('.remove-item').on('click', function(event) {
            event.preventDefault();
            $(this).parent('li').animate({
                opacity: 0},
                300, function() {
                    $(this).remove();
                    _resetItemName();
            });
            return false;
        });

    }
    function _enableSort(){
        $('#cq-expandmenu-admin-container').sortable({
            items: '.content-item',
            axis: 'y',
            cursor: 'move',
            update: _resetItemName
        });
    }
    _enableSort();

    $('.cq-color-input').wpColorPicker({
        width: 200
    });

});
