module.exports = {
    env: {
        browser: true,
        es2021: true,
    },
    extends: [
        'standard-with-typescript',
        'plugin:vue/vue3-essential',
        '@vue/typescript/recommended',
    ],
    overrides: [
        {
            files: [
                '.eslintrc.js',
                '.eslintrc.cjs',
            ],
            env: {
                node: true,
            },
            parserOptions: {
                sourceType: 'script',
            },
        },
    ],
    parser: '@typescript-eslint/parser',
    parserOptions: {
        ecmaVersion: 2021,
        sourceType: 'module',
        project: './tsconfig.json', // Ruta al archivo tsconfig.json de tu proyecto

    },
    plugins: [
        'vue',
    ],
    rules: {
        'no-restricted-syntax': [
            'error',
            {
                selector: 'ImportNamespaceSpecifier',
                message: 'Se permite el uso de @ para importar módulos.',
            },
        ],
    },
};
