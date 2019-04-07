module.exports = {
    'Prueba de Formulario en Dashboard Admin' : function (client) {
        const url = "http://127.0.0.1/wordpress";
        client
            .url(url + '/wp-admin')
            .waitForElementVisible('#user_login', 1000)
            .assert.title('Log In ‹ WordCamp Madrid 2019 — WordPress')
            .setValue('#user_login', 'test')
            .setValue('#user_pass', 'test')
            .click('#wp-submit')
            .waitForElementVisible('#welcome-panel', 1000)
            .assert.containsText('div.welcome-panel h2', 'Welcome to WordPress!', 'Mensaje de Bienvenida Correcto')
            .setValue('#email', 'test@dominio.com')
            .click('#newsletter-add')
            .waitForElementVisible('#welcome-panel', 2000)
            .assert.containsText('#ezdv-message', 'Gracias por subscribirte', 'Suscripción correcta')
            .end();
    }
};
