import {extend} from 'flarum/common/extend';
import app from 'flarum/forum/app';
import UserCard from 'flarum/forum/components/UserCard';
import icon from 'flarum/common/helpers/icon';

app.initializers.add('clarkwinkelmann-likes-received', () => {
    extend(UserCard.prototype, 'infoItems', function (items) {
        const likes = this.attrs.user.attribute('likesReceived');

        if (Number.isInteger(likes)) {
            items.add('likesReceived', m('span.UserCard-likesReceived', [
                icon('far fa-thumbs-up'),
                ' ',
                app.translator.trans('clarkwinkelmann-likes-received.forum.user-card.likes', {
                    likes,
                }),
            ]));
        }
    });
});
