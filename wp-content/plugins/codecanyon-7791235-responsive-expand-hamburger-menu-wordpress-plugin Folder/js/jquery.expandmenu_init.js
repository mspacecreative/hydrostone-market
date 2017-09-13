jQuery(document).ready(function($) {
	var _expandmenu_side = $('.expandmenu-side');
	var _background = _expandmenu_side.data('background');
	var _color = _expandmenu_side.data('color');
	var _opacity = _expandmenu_side.data('opacity') || 0.9;
	var _width = _expandmenu_side.data('width');
	var _height = _expandmenu_side.data('height');
	var _extracss = _expandmenu_side.data('extracss');
	var _linkcolor = _expandmenu_side.data('linkcolor');
	var _linkhovercolor = _expandmenu_side.data('linkhovercolor');
	var _linkhoverbackground = _expandmenu_side.data('linkhoverbackground');
	var _positiontop = _expandmenu_side.data('positiontop');
	var _positionright = _expandmenu_side.data('positionright');
	var _textalign = _expandmenu_side.data('textalign');
	var _closeposition = _expandmenu_side.data('closeposition');
	var _menustyle = _expandmenu_side.data('menustyle');
	var _slidebody = _expandmenu_side.data('slidebody');
	// var _positionbottom = _expandmenu_side.data('positionbottom');
	var _positionleft = _expandmenu_side.data('positionleft');
	if(_positiontop!=""){
		_expandmenu_side.css({top: _positiontop });
	}
	if(_positionright!=""){
		_expandmenu_side.css({right: _positionright });
	}
	// if(_positionbottom!=""){
		// _expandmenu_side.css({bottom: _positionbottom });
	// }
	if(_positionleft!=""){
		_expandmenu_side.css({left: _positionleft });
	}

	if(_expandmenu_side.find('.expandmenu-labeltext').html()==""){
		_expandmenu_side.find('.expandmenu-label').css('margin-left', '2px');
	}

	_expandmenu_side.find('.expandmenu-list').css({
		'text-align': _textalign
	});
	_expandmenu_side.find('li').each(function(index) {
		$(this).find('a').css({
			'color': _linkcolor
		});
		$(this).find('a').on('mouseover', function(event) {
			$(this).css({
				'color': _linkhovercolor,
				'background': _linkhoverbackground
			});
		}).on('mouseleave', function(event) {
			$(this).css({
				'color': _linkcolor,
				'background': ''
			});

		});
	});

	_expandmenu_side.css({
		// 'padding': _extracss,
		// 'margin': _extracss,
		'width': _width,
		'height': _height,
		'background-color': _background,
		'color': _color
	});
	var _oldBg = _expandmenu_side.css('background-color'); //rgb(100,100,100)
	var _newBg = _oldBg.replace('rgb', 'rgba').replace(')', ','+_opacity+')'); //rgba(100,100,100,.8)
	$('#expandmenu-checkbox').prop('checked', false);
	$('#expandmenu-checkbox').on('click', function(event) {
		if($(this).is(':checked')){
			if(_slidebody=="on"){
				if(_menustyle=="effect_right"){
					$('body').animate({'margin-right': '+=320'}, 400);
				}else if(_menustyle=="effect_left"){
					$('body').animate({'margin-left': '+=320'}, 400);
				}
			}

			_expandmenu_side.css({
				'width': '',
				'height': ''
			})
		}else{
			if(_slidebody=="on"){
				if(_menustyle=="effect_right"){
					$('body').animate({'margin-right': '-=320'}, 400);
				}else if(_menustyle=="effect_left"){
					$('body').animate({'margin-left': '-=320'}, 400);
				}
			}
			_expandmenu_side.css({
				'width': _width,
				'height': _height
			});
		}
	});
	// console.log('_newBg', _oldBg, _newBg, _background, _expandmenu_side.css('background-color'));
	_expandmenu_side.delay(200).css({'background-color': _newBg});
});
