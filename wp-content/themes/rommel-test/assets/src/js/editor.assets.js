"use strict"

/**
 * Block Editor specifics.
 */
wp.domReady( () => {

    // Remove core blocks.
    wp.blocks.unregisterBlockType( 'core/verse' );
    wp.blocks.unregisterBlockType( 'core/nextpage' );
    wp.blocks.unregisterBlockType( 'core/tag-cloud' );
    wp.blocks.unregisterBlockType( 'core/audio' );
    wp.blocks.unregisterBlockType( 'core/rss' );
    wp.blocks.unregisterBlockType( 'core/social-links' );
    wp.blocks.unregisterBlockType( 'core/quote' );

    wp.blocks.unregisterBlockStyle( 'core/pullquote', 'solid-color' );
    wp.blocks.unregisterBlockStyle( 'core/pullquote', 'default' );
    wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
    wp.blocks.unregisterBlockStyle( 'core/quote', 'default' );
    wp.blocks.unregisterBlockStyle( 'core/image', 'default' );
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );

    wp.blocks.registerBlockStyle( 'core/paragraph', {
        label: 'Lead',
        name: 'lead',
    } );
} );
