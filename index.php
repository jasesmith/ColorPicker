<?php
$colors_in_use = array();
$colors = array(
	//'Soot' 					=> array('lum' => 'dark', 'color' => '#010203', 'text' => '#FFFFFF'),
	
	'Charcoal' 				=> array('lum' => 'medium', 'color' => '#57575A', 'text' => '#FFFFFF'),
	'Cherry' 				=> array('lum' => 'dark', 'color' => '#CC0235', 'text' => '#FFFFFF'),
	'Tangerine' 			=> array('lum' => 'dark', 'color' => '#FF6600', 'text' => '#FFFFFF'),
	'Lemon' 				=> array('lum' => 'dark', 'color' => '#FBCD29', 'text' => '#000000'),
	'Avocado' 				=> array('lum' => 'dark', 'color' => '#6F973B', 'text' => '#FFFFFF'),
	'Surf' 					=> array('lum' => 'dark', 'color' => '#5B80BF', 'text' => '#FFFFFF'),
	'Plum' 					=> array('lum' => 'dark', 'color' => '#613897', 'text' => '#FFFFFF'),
	
	'Ash' 					=> array('lum' => 'light', 'color' => '#969699', 'text' => '#FFFFFF'),
	'Bubble Gum' 			=> array('lum' => 'medium', 'color' => '#F36E98', 'text' => '#000000'),
	'Mango' 				=> array('lum' => 'medium', 'color' => '#F79C3B', 'text' => '#000000'),
	'Banana' 				=> array('lum' => 'medium', 'color' => '#FFFE70', 'text' => '#000000'),
	'Kiwi' 					=> array('lum' => 'medium', 'color' => '#A1CA6D', 'text' => '#000000'),
	'Turquoise' 			=> array('lum' => 'medium', 'color' => '#76BBDD', 'text' => '#000000'),
	'A&ccedil;ai Berry' 	=> array('lum' => 'medium', 'color' => '#656798', 'text' => '#FFFFFF'),
	
	'Smoke' 				=> array('lum' => 'light', 'color' => '#C6C6C9', 'text' => '#000000'),
	'Cotton Candy' 			=> array('lum' => 'light', 'color' => '#FACDCC', 'text' => '#000000'),
	'Squash' 				=> array('lum' => 'light', 'color' => '#FBCD6D', 'text' => '#000000'),
	'Chiffon' 				=> array('lum' => 'light', 'color' => '#FFFE9E', 'text' => '#000000'),
	'Spring' 				=> array('lum' => 'light', 'color' => '#D4FD9E', 'text' => '#000000'),
	'Dusk' 					=> array('lum' => 'light', 'color' => '#B0C8E5', 'text' => '#000000'),
	'Lavender' 				=> array('lum' => 'light', 'color' => '#989ACA', 'text' => '#000000'),
	
	//'Snow' 					=> array('lum' => 'light', 'color' => '#F3F6F9', 'text' => '#000000'),
	);
if(strlen($preset_color) < 1)// pick random color if no incoming color
{
	foreach($colors as $color)
	{
		if(in_array($color['color'],$colors_in_use))
			continue;
			
		$preset_color = $color['color'];
		break;
	}
}

if(strlen($preset_color) < 1)//If out of colors use gizmo blue
{
	$preset_color = $colors['Gizmo']['color'];
}

// handle current color
foreach($colors as $k => $v)
{
	if(in_array($preset_color, $v))
	{
		$current_color = $v['color'];
		$current_text_color = $v['text'];
		break;
	}
}
var_dump($colors);
unset($k,$v);

$current_color = strlen($current_color) > 0 ? $current_color : $preset_color;
$color_picker_label = $color_picker_label ? $color_picker_label : 'Color';
$color_picker_input = $color_picker_input ? $color_picker_input : 'listcolor';
?>
<!DOCTYPE html>
<html>
	<head>
	<link href="css/picker.css" rel="stylesheet" />
	</head>
	<body>
		<div class="color-picker" data-current-color="<?php echo $current_color; ?>" data-current-color-text="<?php echo $current_text_color; ?>" data-current-color="<?php echo $current_color; ?>">
			<?php echo $color_picker_label; ?>
			<div class="color-cue" style="background-color:<?php echo $current_color; ?>;"></div>
			<span class="color-cue-name"><?php echo $current_color; ?></span>
			<input type="hidden" name="<?php echo $color_picker_input ?>" id="<?php echo $color_picker_input ?>" value="<?php echo $preset_color; ?>" />
			
			<div class="color-chips">
				<ul>
				<?php
				foreach($colors as $name => $props)
				{
					$active = $preset_color == $props['color'] ? ' active' : '';
					?>
					<li class="<?php echo $active; ?>"><div class="color-box" data-colorname="<?php echo $name; ?>" data-color="<?php echo $props['color']; ?>" data-colortext="<?php echo $props['text']; ?>" title="<?php echo $name; ?>" style="background-color:<?php echo $props['color']; ?>;"></div></li>
					<?php
				}
				?>
				</ul>
				<ul class="divider">
					<li class="previewer"><div class="color-box" data-colorname="<?php echo $current_color; ?>" data-color="<?php echo $preset_color; ?>" data-colortext="<?php echo $current_text_color; ?>" title="current choice" style="background-color:<?php echo $preset_color; ?>;"></div></li>
					<li class="previewer"><input type="text" class="picker-preview" value="<?php echo $preset_color; ?>" style="background-color:<?php echo $preset_color; ?>;color:#FFFFFF;" /></li>
					<li class="previewer"><div class="color-cue-name">lala<?php echo $current_color; ?></div></li>
				</ul>
				<?php
				
				// currently in use
				/*
				if(count($colors_in_use) > 0)
				{
				?>
				<div class="divider colors-in-use">
					<div class="divider-heading">Currently in use:</div>
						<ul>
						<?php
						foreach($colors_in_use as $color)
						{
							?>
							<li><div class="color-in-use" data-color="<?php echo $color['color'];?>" style="background-color:<?php echo $color['color'];?>;"><?php echo $color['name'];?></div></li>
							<?php
						}
						?>
						</ul>
				</div>
				<?php
				}
				*/
				?>
			</div>
		</div>
		<script src="/core/j/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				var colorPicker = $('div.color-picker');
				var colors = colorPicker.find('.color-box');
				/*
				var customColors = $('div.color-picker .custom').find('.color-box');
				var colorsUsed = $('div.color-picker').find('.color-in-use');
				*/
				var currColor = colorPicker.data('current-color');
				var currTextColor = colorPicker.data('current-color-text');
				var currColorName = '<?php echo $current_color; ?>';
				var currColorBorder = SGAPI.util.colorShift(currColor,'#000000',.15);
				var previewColor = $('div.color-picker').find('.picker-preview');
				
				$('#color-cue').css({backgroundColor:currColor,borderColor:currColorBorder});
				
				colors.bind('click', function(){
					var color = $(this).data('color');
					var textColor = $(this).data('textcolor');
					var colorName = $(this).data('colorname');
					var borderColor = SGAPI.util.colorShift(color,'#000000',.15);
					
					currColor = color;
					currTextColor = textColor;
					currColorName = colorName;
					colors.parent().removeClass('active');
					
					$(this).parent().addClass('active');
					$('#<?php echo $color_picker_input ?>').val(color);
					$('#color-cue-name').text(colorName);
					$('#color-cue, .sync-swatch').css({backgroundColor:color,borderColor:borderColor});
				});
				/*
				customColors.bind('click', function(){
					var customId = $(this).attr('custom');
					previewColor.attr('placeholder','enter hex');
					previewColor.attr('custom',customId);
				});
				*/
				colors.bind('mouseenter', function(){
					var color = $(this).data('color');
					var textColor = $(this).data('textcolor');
					var colorName = $(this).data('colorname');
					$('div.color-picker').find('.color-cue-name').text(colorName);
					previewColor.val(color).css({backgroundColor:color,color:textColor});
				});
				colors.bind('mouseleave', function(){
					var color = currColor;
					var textColor = currTextColor;
					var colorName = currColorName;
					$('div.color-picker').find('.color-cue-name').text(colorName);
					previewColor.val(color).css({backgroundColor:color,color:textColor});
				});
				
				colorsUsed.bind('mouseenter', function(){
					var color = $(this).data('color');
					var targetColor = $('div.color-picker').find('[data-color="' + color + '"]');
					console.log(color, targetColor);
					targetColor.parent('li').addClass('highlight');
				});
				colorsUsed.bind('mouseleave', function(){
					var color = $(this).data('color');
					var targetColor = $('div.color-picker').find('[data-color="' + color + '"]');
					console.log(color, targetColor);
					targetColor.parent('li').removeClass('highlight');
				});
				
				previewColor.bind('keyup', function(){
					var newVal = $(this).val();
					var textColor = '#FFFFFF';
					/*
					if($(this).attr('custom').length) {
						var customId = $(this).attr('custom');
						var newColorName = newVal;
						var newColor = newVal;
						var newTextColor = textColor;
						var newColorBox = $('.color-box[custom="'+customId+'"]');
						
						newColorBox.css({backgroundColor:newVal});
						newColorBox.data('color',newColor);
						newColorBox.data('textcolor',newTextColor);
						if(event.which == 13) {
							newColorBox.removeClass('custom').addClass('custom-defined').removeAttr('custom');
						}
					}
					*/
					$('#<?php echo $color_picker_input ?>').val(newVal);
					$('#color-cue-name').text(newVal);
					$('#color-cue, .sync-swatch').css({backgroundColor:newVal});
					previewColor.css({backgroundColor:newVal,color:textColor});
				});
				
				$('input.picker-preview').draggable();
				$('.custom').find('.color-box').droppable({
					accept: 'input.picker-preview',
					drop: function( event, ui ) {
						$( this )
						.addClass( "ui-state-highlight" )
						.find( "p" )
						.html( "Dropped!");
					}
				});
			});
		</script>
	</body>
</html>