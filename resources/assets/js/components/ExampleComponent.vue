<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Notificações</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="notification in notifications">{{ notification.message }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                notifications: []
            }
        },
        mounted() {
            Echo.private('App.User.' + this.user)
                .notification((notification) => {
                    this.notifications.push(notification)
                    let not = new Notification(notification.message, {
                        icon: 'http://logonoid.com/images/laravel-logo.png'
                    });

                    not.onclick = () => {
                        window.open('https://schoolofnet.com');
                    }
                })
        }
    }
</script>
