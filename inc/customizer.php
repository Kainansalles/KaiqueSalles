<?php
function meu_personalizador($wp_customize){
	// Seção Serviços
	$wp_customize->add_section( 'sec_servicos', array(
		'title'			=> 'Serviços',
		'description'	=> 'Seção para os serviços'
	));
	// Serviço - Imagem de fundo
	$wp_customize->add_setting( 'set_servicos', array(
		'default'	=> ''
	));
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'ctrl_servicos_item', array(
		'label'		=> 'Imagem de fundo',
		'width'		=> 1920,
		'height'	=> 1280,
		'section'	=> 'sec_servicos',
		'settings'	=> 'set_servicos'
	)));

}
add_action( 'customize_register', 'meu_personalizador' );
