<?php
$colors_in_use = array();
$colors = array(
	'Dark Red' 				=> array('lum' => 'dark', 'color' => '#33030F'),
	'Dark Orange' 			=> array('lum' => 'dark', 'color' => '#481606'),
	'Dark Yellow' 			=> array('lum' => 'dark', 'color' => '#4F3B00'),
	'Dark Green' 			=> array('lum' => 'dark', 'color' => '#0F1E06'),
	'Dark Blue' 			=> array('lum' => 'dark', 'color' => '#0E182C'),
	'Dark Purple' 			=> array('lum' => 'dark', 'color' => '#141023'),
	'Dark Dark' 			=> array('lum' => 'dark', 'color' => '#111112'),

	'Passion' 				=> array('lum' => 'dark', 'color' => '#66051D'),
	'Clay' 					=> array('lum' => 'dark', 'color' => '#912D0C'),
	'Belly' 				=> array('lum' => 'dark', 'color' => '#9E7500'),
	'Forest' 				=> array('lum' => 'dark', 'color' => '#1D3B0D'),
	'Rift' 					=> array('lum' => 'dark', 'color' => '#1C3058'),
	'Deep' 					=> array('lum' => 'dark', 'color' => '#272145'),
	'Soot' 					=> array('lum' => 'dark', 'color' => '#212125'),

	'Cranberry' 			=> array('lum' => 'medium', 'color' => '#99082C'),
	'Valencia' 				=> array('lum' => 'medium', 'color' => '#D94312'),
	'Custard' 				=> array('lum' => 'medium', 'color' => '#EDB000'),
	'Moss' 					=> array('lum' => 'medium', 'color' => '#2C5913'),
	'Oceana' 				=> array('lum' => 'medium', 'color' => '#2A4884'),
	'Grape Juice' 			=> array('lum' => 'medium', 'color' => '#3B3168'),
	'Charcoal' 				=> array('lum' => 'medium', 'color' => '#323237'),
	
	'Berry Yogurt' 			=> array('lum' => 'medium', 'color' => '#B23959'),
	'Tangerine' 			=> array('lum' => 'medium', 'color' => '#E36A38'),
	'Lemon' 				=> array('lum' => 'medium', 'color' => '#F2C433'),
	'Avocado' 				=> array('lum' => 'medium', 'color' => '#588341'),
	'Surf' 					=> array('lum' => 'medium', 'color' => '#5376A3'),
	'Plum' 					=> array('lum' => 'medium', 'color' => '#685D8E'),
	'Slate' 				=> array('lum' => 'medium', 'color' => '#57575A'),
	
	'Bubble Gum' 			=> array('lum' => 'medium', 'color' => '#CB6B86'),
	'Mango' 				=> array('lum' => 'medium', 'color' => '#EC905E'),
	'Banana' 				=> array('lum' => 'medium', 'color' => '#F6D866'),
	'Kiwi' 					=> array('lum' => 'medium', 'color' => '#85AC70'),
	'Rain' 					=> array('lum' => 'medium', 'color' => '#7BA4C2'),
	'A&ccedil;ai Berry' 	=> array('lum' => 'medium', 'color' => '#9588B4'),
	'Ash' 					=> array('lum' => 'medium', 'color' => '#969699'),
	
	'Pink' 					=> array('lum' => 'light', 'color' => '#E39CB2'),
	'Squash' 				=> array('lum' => 'light', 'color' => '#F6B784'),
	'Chiffon' 				=> array('lum' => 'light', 'color' => '#FBEB99'),
	'Spring' 				=> array('lum' => 'light', 'color' => '#B1D69E'),
	'Sky' 					=> array('lum' => 'light', 'color' => '#A4D1E0'),
	'Lavender' 				=> array('lum' => 'light', 'color' => '#C2B4D9'),
	'Smoke' 				=> array('lum' => 'light', 'color' => '#C6C6C9'),
	
	'Cotton Candy' 			=> array('lum' => 'light', 'color' => '#FCCDDF'),
	'Papyrus' 				=> array('lum' => 'light', 'color' => '#FFDDAA'),
	'Sunshine' 				=> array('lum' => 'light', 'color' => '#FFFFCC'),
	'Mint' 					=> array('lum' => 'light', 'color' => '#DDFFCC'),
	'Wash' 					=> array('lum' => 'light', 'color' => '#CCFFFF'),
	'Dusk' 					=> array('lum' => 'light', 'color' => '#EFDFFF'),
	'Snow' 					=> array('lum' => 'light', 'color' => '#F3F6F9')
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
	if($preset_color == $props['color'])
	{
		$current_color = $props['color'];
		$current_color_name = $name;
		break;
	}
}
//echo '<pre>';var_dump($current_color, $current_color_text,$current_color_name);echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>ColorPicker</title>
		<link rel="stylesheet" href="css/base.css" />
		<link rel="stylesheet" href="css/picker.css" />
	</head>
	
	<body>
		<section>
			<header>
				<h1><span class="mark">ColorPicker</span> <small>A CSS3/jQuery + PHP Color Picker </small></h1>
			</header>
			<article>
				<h2 class="mark">Sample Form</h2>
				<div class="form-row">
					<div class="control-label">
						Header Text
					</div>
					<div class="control-input">
						<input type="text" value="" placeholder="A Headline" />
					</div>
				</div>
				<div class="form-row">
					<div class="control-label">
						Header Color
					</div>
					<div class="control-input">
						
						<div class="color-picker" data-current-color="<?php echo $current_color; ?>" data-current-color-name="<?php echo $current_color_name; ?>">
							<input type="checkbox" id="toggle-picker" class="toggle toggle-picker" />
							<label for="toggle-picker" class="color-button-group">
								<span class="color-box color-cue"></span>
								<span class="color-cue-name"><?php echo $current_color_name ?></span>
								<input type="text" class="color-picker-input" maxlength="7" name="header-color" id="header-color" value="<?php echo $current_color; ?>" />
							</label>
							
							<div class="color-chips">
								<input type="checkbox" id="toggle-dark" class="toggle toggle-lum toggle-dark" />
								<label for="toggle-dark" class="handle">dark</label>
								
								<input type="checkbox" id="toggle-medium" class="toggle toggle-lum toggle-medium" checked="checked" />
								<label for="toggle-medium" class="handle">medium</label>
								
								<input type="checkbox" id="toggle-light" class="toggle toggle-lum toggle-light" checked="checked" />
								<label for="toggle-light" class="handle">light</label>
								
								<ul>
								<?php
								foreach($colors as $name => $props)
								{
									$checked = $current_color == $props['color'] ? ' checked="checked"' : '';
									$clean_hex = str_replace('#','', $props['color']);
									?>
									<li class="<?php echo $props['lum'] ?>">
										<input type="radio" name="c" id="color-<?php echo $clean_hex; ?>" data-colorname="<?php echo $name; ?>" value="<?php echo $props['color']; ?>"<?php echo $checked ?> />
										<label for="color-<?php echo $clean_hex; ?>" class="color-box" data-title="<?php echo $name; ?> (<?php echo $props['color']; ?>)" style="background-color:<?php echo $props['color']; ?>;">
											<span><?php echo $name ?></span>
										</label>
									</li>
									<?php
								}
								unset($checked, $clean_hex);
								?>
								</ul>
								<ul class="divider">
									<li class="previewer">
										<?php $checked = !array_key_exists($current_color_name, $colors) ? ' checked="checked"' : ''; ?>
										<input type="radio" name="c" class="color-custom" value="custom"<?php echo $checked ?> />
										<input type="text" id="custom" class="color-cue color-picker-input" maxlength="7" value="<?php echo $current_color; ?>" />
									</li>
									<li class="previewer">
										<div class="color-cue-name picker-preview-name"><?php echo $current_color_name; ?></div>
									</li>
								</ul>
								<label for="toggle-picker" class="close-picker">&times;</label>
							</div>
						</div>
						
						
					</div>
				</div>
			</article>
			<footer>
				<a href="https://github.com/pixleyes/ColorPicker">ColorPicker on GitHub</a>
			</footer>
		</section>
		<script src="/core/j/jquery-2.0.3.min.js"></script>
		<script type="text/javascript">
			($(function(){
				var $colorPicker = $('.color-picker');
				var $colorPickerInputs = $('.color-picker-input');
				var $customOption = $('.color-custom');
				var $colorCues = $colorPicker.find('.color-cue');
				var $colorCueNames = $colorPicker.find('.color-cue-name');
				
				var colors = $colorPicker.find('[type="radio"]');
				
				var currColor = $colorPicker.data('current-color');
				var currColorText = getContrastYIQ(currColor);
				var currColorName = $colorPicker.data('current-color-name');
				
				$colorCues.css({backgroundColor:currColor,color:currColorText});
				$colorCueNames.text(currColorName);
				
				colors.on('click', function(){
					
					var color = $(this).val();
					var colorText = getContrastYIQ(color);// $(this).data('colortext');
					var colorName = $(this).data('colorname');
					
					$colorPickerInputs.val(color);
					$colorCueNames.text(colorName);
					$colorCues.css({backgroundColor:color,color:colorText});
				});
				
				$colorPickerInputs
				.on('keyup', function(e){
					var hexcolor = $(this).val();
					var cleanHex = hexcolor.replace('#','');
					var colorText = getContrastYIQ(cleanHex);
					
					hexcolor = '#' + cleanHex;
					
					if(!$customOption.is(':checked')) {
						$customOption.val(hexcolor).click();
					}
					
					var setHex = (hexcolor.length == 7) ? hexcolor : '#000000';
					
					$colorPickerInputs.not($(this)).val(hexcolor);
					
					$colorCues.css({backgroundColor:setHex,color:colorText});
					$colorCueNames.text('custom');
					$('.picker-preview-name').text('custom');
				})
				.on('click', function(e){
					e.preventDefault();
				});
			}));
			
			function getContrastYIQ(hexcolor){
				hexcolor = hexcolor.replace('#','');
				var r = parseInt(hexcolor.substr(0,2),16);
				var g = parseInt(hexcolor.substr(2,2),16);
				var b = parseInt(hexcolor.substr(4,2),16);
				var yiq = ((r*299)+(g*587)+(b*114))/1000;
				return (yiq >= 128) ? '#000000' : '#FFFFFF';
			}
		</script>
	</body>
</html>