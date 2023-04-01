module.exports = {
	globDirectory: 'Main/',
	globPatterns: [
		'**/*.{png,jpg,jpeg,css,html,scss,js}'
	],
	swDest: 'Main/sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};