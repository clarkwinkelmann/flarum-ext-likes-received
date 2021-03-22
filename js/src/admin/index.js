import app from 'flarum/app';

app.initializers.add('clarkwinkelmann-likes-received', () => {
    app.extensionData.for('clarkwinkelmann-likes-received')
        .registerPermission({
            icon: 'fas fa-thumbs-up',
            label: app.translator.trans('clarkwinkelmann-likes-received.admin.permission.view'),
            permission: 'clarkwinkelmann-likes-received.view',
            allowGuest: true,
        }, 'view');
});
