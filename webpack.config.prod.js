const {merge} = require('webpack-merge')
const common = require('./webpack.config.common')
const OptimizeCssAssetsplugin = require('optimize-css-assets-webpack-plugin')
const TerserPlugin = require('terser-webpack-plugin')

module.exports = merge(common, {
  mode: "production",
  optimization: {
    minimizer: [
      new OptimizeCssAssetsplugin(),
      new TerserPlugin()
    ]
  }
})