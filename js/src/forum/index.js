import {extend} from 'flarum/extend';
import app from 'flarum/app';
import UserCard from 'flarum/components/UserCard';
import icon from 'flarum/helpers/icon';

/* global m */

app.initializers.add('clarkwinkelmann-likes-received', () => {
    extend(UserCard.prototype, 'infoItems', function (items) {
        const likes = this.attrs.user.attribute('likesReceived');

        if (Number.isInteger(likes)) {
            items.add('likesReceived', m('span.UserCard-likesReceived', [
                icon('far fa-thumbs-up'),
                ' ',
                app.translator.trans('clarkwinkelmann-likes-received.forum.user-card.likes', {
                    likes: likes + '', // Cast to string to show zero
                }),
            ]));
        }
    });
});
