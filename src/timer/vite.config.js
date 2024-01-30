import path from 'path';
import inject from "@rollup/plugin-inject";

const distName = "dist";

export default {
  root: path.resolve(__dirname, 'src'),
  base: path.join(path.basename(__dirname), distName),
  build: {
    outDir: `../${distName}`
  },
  resolve: {
    alias: {
      '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
      '~assets': '/assets/',
      '~styles': '/scss/',
    }
  },
  plugins: [
    inject({   // => that should be first under plugins array
        $: 'jquery',
        jQuery: 'jquery',
        }),
    ], 
  server: {
    port: 8080,
    hot: true
  }
}