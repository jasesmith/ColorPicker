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
/*
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
*/
if(strlen($preset_color) < 1)//If out of colors use surf blue
{
	$preset_color_name = 'Surf';
	$preset_color = $colors[$preset_color_name]['color'];
}

// handle current color
foreach($colors as $name => $props)
{
	if(in_array($preset_color, $props))
	{
		$current_color = $props['color'];
		$current_color_text = $props['text'];
		$current_color_name = $name;
		break;
	}
}
//echo '<pre>';var_dump($current_color, $current_color_text,$current_color_name);echo "</pre>";
unset($k,$v);

$current_color = strlen($current_color) > 0 ? $current_color : $preset_color;
$color_picker_label = $color_picker_label ? $color_picker_label : 'Color';
$color_picker_input = $color_picker_input ? $color_picker_input : 'color';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Color Picker</title>
		<link href="css/picker.css" rel="stylesheet" />
	</head>
	<body>
		<div class="color-picker" data-current-color="<?php echo $current_color; ?>" data-current-color-text="<?php echo $current_text_color; ?>" data-current-color-name="<?php echo $current_color_name; ?>">
			<?php echo $color_picker_label; ?>
			<div class="color-box color-cue"></div>
			<span class="color-cue-name"></span>
			<input type="hidden" class="color-picker-input picker-preview" name="<?php echo $color_picker_input ?>" id="<?php echo $color_picker_input ?>" value="<?php echo $current_color; ?>" />
			
			<div class="color-chips">
				<ul>
				<?php
				foreach($colors as $name => $props)
				{
					$checked = $preset_color == $props['color'] ? ' checked="checked"' : '';
					$clean_hex = str_replace('#','', $props['color']);
					?>
					<li>
						<input type="radio" name="c" id="color-<?php echo $clean_hex; ?>" data-colorname="<?php echo $name; ?>" data-colortext="<?php echo $props['text']; ?>" value="<?php echo $props['color']; ?>"<?php echo $checked ?> />
						<label for="color-<?php echo $clean_hex; ?>" class="color-box" title="<?php echo $name; ?>" style="background-color:<?php echo $props['color']; ?>;">
							<span><?php echo $name ?></span>
						</label>
					</li>
					<?php
				}
				?>
				</ul>
				<ul class="divider">
					<li class="previewer">
						<input id="custom" type="text" class="color-cue picker-preview" value="<?php echo $current_color; ?>" />
					</li>
					<li class="previewer">
						<div class="color-cue-name picker-preview-name"><?php echo $current_color_name; ?></div>
					</li>
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
		<script src="/core/j/jquery-2.0.3.min.js"></script>
		<script type="text/javascript">
			$(function(){
				var $colorPicker = $('div.color-picker');
				var $previewColor = $colorPicker.find('.picker-preview');
				
				var colors = $colorPicker.find('[type="radio"]');
				
				var currColor = $colorPicker.data('current-color');
				var currColorText = getContrastYIQ(currColor);
				var currColorName = $colorPicker.data('current-color-name');
//				var currColorBorder = shiftHex(currColor,'#000000',.15);
				$('.color-cue').css({backgroundColor:currColor,color:currColorText});
				$('.color-cue-name').text(currColorName);
				
				colors.on('click', function(){
					var color = $(this).val();
					var colorText = getContrastYIQ(color);// $(this).data('colortext');
					var colorName = $(this).data('colorname');
//					var borderColor = shiftHex(color,'#000000',.15);
					
					$('.picker-preview').val(color);
					$('.color-cue-name').text(colorName);
					$('.color-cue').css({backgroundColor:color,color:colorText});
				});
				
				$previewColor.on('keyup', function(){
					var newVal = $(this).val();
					var colorText = getContrastYIQ(newVal);
					$('.color-picker-input').val(newVal);
					$('.color-cue-name').text(newVal);
					$('.picker-preview-name').text('custom');
					$('.color-cue').css({backgroundColor:newVal});
					$previewColor.css({backgroundColor:newVal,color:colorText});
				});
			});
			
			function getContrastYIQ(hexcolor){
				hexcolor = hexcolor.replace('#','');
				var r = parseInt(hexcolor.substr(0,2),16);
				var g = parseInt(hexcolor.substr(2,2),16);
				var b = parseInt(hexcolor.substr(4,2),16);
				var yiq = ((r*299)+(g*587)+(b*114))/1000;
				return (yiq >= 128) ? 'black' : 'white';
			}
			
			function getContrast50(hexcolor){
				hexcolor = hexcolor.replace('#','');
				return (parseInt(hexcolor, 16) > 0xffffff/2) ? 'black':'white';
			}
/*
			function shiftHex(hexfrom,hexto,i){
				i = i || .5;
				
				var r1 = parseInt(hexfrom.substr(1,2),16);
				var g1 = parseInt(hexfrom.substr(3,2),16);
				var b1 = parseInt(hexfrom.substr(5,2),16);
				
				var r2 = parseInt(hexto.substr(1,2),16);
				var g2 = parseInt(hexto.substr(3,2),16);
				var b2 = parseInt(hexto.substr(5,2),16);
				
				var r = parseInt( r1 - ((r1 - r2) * i));
				var g = parseInt( g1 - ((g1 - g2) * i));
				var b = parseInt( b1 - ((b1 - b2) * i));
				
				r = r.toString(16);
				g = g.toString(16);
				b = b.toString(16);
				
				r = r.length < 2 ? "0" + r : r;
				g = g.length < 2 ? "0" + g : g;
				b = b.length < 2 ? "0" + b : b;
				
				return "#" + r + g + b;
			}
*/
		</script>
	</body>
</html>