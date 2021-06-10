const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const Imageminplugin = require('imagemin-webpack-plugin').default
const glob = require('glob')

module.exports = {
  mode: 'development',
  // js
  output: {
    filename: 'main.bundle.js',
    path: path.resolve(__dirname, 'dist'),
  },
  plugins: [
    new Imageminplugin({
      externalImage: {
        context: '.',
        sources: glob.sync('**/*.{jpg,jpeg,png,gif,svg}'),
        destination: 'dist/images',
        fileName: '[name].[ext]',
      },
    }),
    new MiniCssExtractPlugin(),
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [require('tailwindcss'), require('autoprefixer')],
              },
            },
          },
          'sass-loader',
        ],
      },
    ],
  },
}
