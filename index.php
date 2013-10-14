<?php
$colors_in_use = array();
$colors = array(
	//'Soot' 					=> array('lum' => 'dark', 'color' => '#010203', 'text' => '#FFFFFF'),
	
	'Passion' 				=> array('lum' => 'dark', 'color' => '#5E1527', 'text' => '#FFFFFF'),
	'Clay' 					=> array('lum' => 'dark', 'color' => '#7E331A', 'text' => '#FFFFFF'),
	'Belly' 				=> array('lum' => 'dark', 'color' => '#886911', 'text' => '#FFFFFF'),
	'Forest' 				=> array('lum' => 'dark', 'color' => '#273E1B', 'text' => '#FFFFFF'),
	'Rift' 					=> array('lum' => 'dark', 'color' => '#263553', 'text' => '#FFFFFF'),
	'Deep' 					=> array('lum' => 'dark', 'color' => '#2F2A45', 'text' => '#FFFFFF'),
	'Soot' 					=> array('lum' => 'dark', 'color' => '#222226', 'text' => '#FFFFFF'),
	
	'Cranberry' 			=> array('lum' => 'dark', 'color' => '#99082C', 'text' => '#FFFFFF'),
	'Valencia' 				=> array('lum' => 'dark', 'color' => '#D94312', 'text' => '#FFFFFF'),
	'Custard' 				=> array('lum' => 'dark', 'color' => '#EDB000', 'text' => '#FFFFFF'),
	'Moss' 					=> array('lum' => 'dark', 'color' => '#2C5913', 'text' => '#FFFFFF'),
	'Oceana' 				=> array('lum' => 'dark', 'color' => '#2A4884', 'text' => '#FFFFFF'),
	'Grape Juice' 			=> array('lum' => 'dark', 'color' => '#3B3168', 'text' => '#FFFFFF'),
	'Charcoal' 				=> array('lum' => 'dark', 'color' => '#323237', 'text' => '#FFFFFF'),
	
	'Berry Yogurt' 			=> array('lum' => 'dark', 'color' => '#B23959', 'text' => '#FFFFFF'),
	'Tangerine' 			=> array('lum' => 'dark', 'color' => '#E36A38', 'text' => '#FFFFFF'),
	'Lemon' 				=> array('lum' => 'dark', 'color' => '#F2C433', 'text' => '#000000'),
	'Avocado' 				=> array('lum' => 'dark', 'color' => '#588341', 'text' => '#FFFFFF'),
	'Surf' 					=> array('lum' => 'dark', 'color' => '#5376A3', 'text' => '#FFFFFF'),
	'Plum' 					=> array('lum' => 'dark', 'color' => '#685D8E', 'text' => '#FFFFFF'),
	'Slate' 				=> array('lum' => 'medium', 'color' => '#57575A', 'text' => '#FFFFFF'),
	
	'Bubble Gum' 			=> array('lum' => 'medium', 'color' => '#CB6B86', 'text' => '#000000'),
	'Mango' 				=> array('lum' => 'medium', 'color' => '#EC905E', 'text' => '#000000'),
	'Banana' 				=> array('lum' => 'medium', 'color' => '#F6D866', 'text' => '#000000'),
	'Kiwi' 					=> array('lum' => 'medium', 'color' => '#85AC70', 'text' => '#000000'),
	'Rain' 					=> array('lum' => 'medium', 'color' => '#7BA4C2', 'text' => '#000000'),
	'A&ccedil;ai Berry' 	=> array('lum' => 'medium', 'color' => '#9588B4', 'text' => '#FFFFFF'),
	'Ash' 					=> array('lum' => 'light', 'color' => '#969699', 'text' => '#FFFFFF'),
	
	'Pink' 					=> array('lum' => 'light', 'color' => '#E39CB2', 'text' => '#000000'),
	'Squash' 				=> array('lum' => 'light', 'color' => '#F6B784', 'text' => '#000000'),
	'Chiffon' 				=> array('lum' => 'light', 'color' => '#FBEB99', 'text' => '#000000'),
	'Spring' 				=> array('lum' => 'light', 'color' => '#B1D69E', 'text' => '#000000'),
	'Sky' 					=> array('lum' => 'light', 'color' => '#A4D1E0', 'text' => '#000000'),
	'Lavender' 				=> array('lum' => 'light', 'color' => '#C2B4D9', 'text' => '#000000'),
	'Smoke' 				=> array('lum' => 'light', 'color' => '#C6C6C9', 'text' => '#000000'),
	
	'Cotton Candy' 			=> array('lum' => 'light', 'color' => '#FCCDDF', 'text' => '#000000'),
	'Papyrus' 				=> array('lum' => 'light', 'color' => '#FFDDAA', 'text' => '#000000'),
	'Sunshine' 				=> array('lum' => 'light', 'color' => '#FFFFCC', 'text' => '#000000'),
	'Mint' 					=> array('lum' => 'light', 'color' => '#DDFFCC', 'text' => '#000000'),
	'Wash' 					=> array('lum' => 'light', 'color' => '#CCFFFF', 'text' => '#000000'),
	'Dusk' 					=> array('lum' => 'light', 'color' => '#EFDFFF', 'text' => '#000000'),
	'Snow' 					=> array('lum' => 'light', 'color' => '#F3F6F9', 'text' => '#000000'),
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
			<input type="checkbox" id="toggle-picker" class="toggle-picker" />
			<label for="toggle-picker" class="color-box color-cue"></label>
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
						<label for="color-<?php echo $clean_hex; ?>" class="color-box" data-title="<?php echo $name; ?> (<?php echo $props['color']; ?>)" style="background-color:<?php echo $props['color']; ?>;">
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
				<label for="toggle-picker" class="close-picker">&times;</label>
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
					$(this).css({backgroundColor:newVal,color:colorText});
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