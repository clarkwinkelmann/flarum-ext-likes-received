import app from 'flarum/admin/app';
import Extend from 'flarum/common/extenders';

export default [
    new Extend.Admin()
        .permission(() => ({
            icon: 'fas fa-thumbs-up',
            label: app.translator.trans('clarkwinkelmann-likes-received.admin.permission.view'),
            permission: 'clarkwinkelmann-likes-received.view',
            allowGuest: true,
        }), 'view'),
];
