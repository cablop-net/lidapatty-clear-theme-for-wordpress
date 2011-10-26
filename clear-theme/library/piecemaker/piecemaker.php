<?php require_once( '../../../../../wp-load.php' );
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="utf-8" ?>';

$slides = get_option('invent-slider');
$titles = get_option('invent-slider-titles');
$links = get_option('invent-slider-links');
?>
<Piecemaker>
  <Contents>
	<?php foreach($slides as $i => $image) { ?>
    <Image Source="<?php echo $image ?>" Title="<?php echo $titles[$i] ?>">
	<?php if(!empty($links[$i])) { ?><Hyperlink URL="<?php echo $links[$i] ?>" Target="_blank" /><?php } ?>
	</Image>
	<?php } ?>
  </Contents>
  <Settings ImageWidth="960" ImageHeight="460" LoaderColor="0x333333" InnerSideColor="0x222222" SideShadowAlpha="0.8" DropShadowAlpha="0.7" DropShadowDistance="25" DropShadowScale="0.95" DropShadowBlurX="40" DropShadowBlurY="4" MenuDistanceX="20" MenuDistanceY="50" MenuColor1="0x999999" MenuColor2="0x333333" MenuColor3="0xFFFFFF" ControlSize="100" ControlDistance="20" ControlColor1="0x222222" ControlColor2="0xFFFFFF" ControlAlpha="0.8" ControlAlphaOver="0.95" ControlsX="450" ControlsY="280&#xD;&#xA;" ControlsAlign="center" TooltipHeight="30" TooltipColor="0x222222" TooltipTextY="5" TooltipTextStyle="P-Italic" TooltipTextColor="0xFFFFFF" TooltipMarginLeft="5" TooltipMarginRight="7" TooltipTextSharpness="50" TooltipTextThickness="-100" InfoWidth="400" InfoBackground="0xFFFFFF" InfoBackgroundAlpha="0.95" InfoMargin="15" InfoSharpness="0" InfoThickness="0" Autoplay="<?php echo get_option('invent-slider-piecemaker-pause-time') ?>" FieldOfView="<?php echo get_option('invent-slider-piecemaker-fov') ?>"></Settings>
  <Transitions>
    <Transition Pieces="<?php echo get_option('invent-slider-piecemaker-slices') ?>" Time="<?php echo get_option('invent-slider-piecemaker-time') ?>" Transition="<?php echo get_option('invent-slider-piecemaker-effects') ?>" Delay="<?php echo get_option('invent-slider-piecemaker-delay') ?>" DepthOffset="<?php echo get_option('invent-slider-piecemaker-depth-offset') ?>" CubeDistance="<?php echo get_option('invent-slider-piecemaker-cube-distance') ?>"></Transition>
  </Transitions>
</Piecemaker>