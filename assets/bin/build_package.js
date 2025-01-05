const { getRollupConfiguration } = require('./rollup');
const rollup = require('rollup');

async function main() {
    const rollupConfiguration = getRollupConfiguration();

    const bundle = await rollup.rollup(rollupConfiguration);

    await bundle.write(rollupConfiguration.output);
}

main();