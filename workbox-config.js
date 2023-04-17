module.exports = {
	globDirectory: 'Main/',
	globPatterns: [
		// '**/*.{png,jpg,jpeg,scss,js}'
		'**/*.{png,jpg}'
	],
	swDest: 'Main/sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};