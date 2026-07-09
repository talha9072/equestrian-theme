( function () {
	const { registerBlockType } = wp.blocks;
	const { createElement: el } = wp.element;

	function serverPlaceholder( label ) {
		return function () {
			return el(
				'div',
				{
					style: {
						display: 'inline-block',
						padding: '4px 8px',
						background: '#f0f0f0',
						border: '1px dashed #999',
						borderRadius: '3px',
						fontSize: '12px',
						color: '#555',
					},
				},
				label
			);
		};
	}

	registerBlockType( 'equestrian-theme/episode-number', {
		title: 'Episode Number',
		category: 'theme',
		icon: 'microphone',
		usesContext: [ 'postId' ],
		edit: serverPlaceholder( 'EP #' ),
		save: function () { return null; },
	} );

	registerBlockType( 'equestrian-theme/episode-duration', {
		title: 'Episode Duration',
		category: 'theme',
		icon: 'clock',
		usesContext: [ 'postId' ],
		edit: serverPlaceholder( '⏱ Duration' ),
		save: function () { return null; },
	} );

	registerBlockType( 'equestrian-theme/episode-play', {
		title: 'Episode Play Button',
		category: 'theme',
		icon: 'controls-play',
		usesContext: [ 'postId' ],
		edit: serverPlaceholder( '▶ Play' ),
		save: function () { return null; },
	} );
} )();
