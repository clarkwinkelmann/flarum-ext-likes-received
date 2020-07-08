import {extend} from 'flarum/extend';
import app from 'flarum/app';
import PermissionGrid from 'flarum/components/PermissionGrid';

app.initializers.add('clarkwinkelmann-likes-received', () => {
    extend(PermissionGrid.prototype, 'viewItems', items => {
        items.add('clarkwinkelmann-likes-received', {
            icon: 'fas fa-thumbs-up',
            label: app.translator.trans('clarkwinkelmann-likes-received.admin.permission.view'),
            permission: 'clarkwinkelmann-likes-received.view',
            allowGuest: true,
        });
    });
});
