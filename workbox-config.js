module.exports = {
	globDirectory: 'Main/',
	globPatterns: [
		'**/*.{png,jpg,jpeg,scss,js}'
	],
	swDest: 'Main/sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};