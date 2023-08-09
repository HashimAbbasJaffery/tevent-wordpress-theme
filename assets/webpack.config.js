const path = require("path");
const extractCssPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const cssnano = require("cssnano");

const JS_DIR = path.resolve(__dirname, "js");
const BUILD = path.resolve(__dirname, "build");

// Entry point of our JS
entry = {
    main: JS_DIR + "/main.js",
};

// Entry point of the output
output = {
    path: BUILD,
    filename: 'js/[name].js'
};

// Rules for the webpack

const rules = [

    // Rule for the JavaScript
    {
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node_modules/,
        use: 'babel-loader' 
    },

    // Rule for the scss
    {
        test: /\.css$/,
        exclude: /node_modules/,
        use: [
            extractCssPlugin.load,
            "style-loader",
            "css-loader"
        ] 
    },

    // Rule for the images
    {
        test: /\.(png|jpg|jpeg)$/,
        use: [
            {
                loader: "file-loader",
                options: {
                    name: "[path][name].[ext]",
                    publicPath: ( process.env.NODE_ENV === "production" ) ? "../" : "../../"
                }
            }
        ] 
    }
]


// Defining the plugins 

const plugins = argv => {
    return [
        new CleanWebpackPlugin({
            cleanStaleWebpackAssets: argv.mode === "production"
        }),
        new extractCssPlugin({
            filename: "css/[name].css"
        }),
        new OptimizeCssAssetsPlugin({
            cssProcessor: cssnano
        })
    ]
}

module.exports = ( env, argv ) => {
    return {
        entry: entry,
        output: output,
        module: {
            rules: rules
        },
        optimization: {
            minimizer: [
                new UglifyJsPlugin({
                    cache: false,
                    sourceMap: true,
                    parallel: true 
                })
            ]
        },
        plugins: plugins( argv )
    }
}