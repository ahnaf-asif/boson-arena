<template>
    <v-app>
        <v-navigation-drawer app v-model="drawer">
            <div class="container">
                hello world
            </div>
        </v-navigation-drawer>

        <v-app-bar color="cyan darken-4" dark  app>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-spacer></v-spacer>
            <span>
                JN Islam Mega Fest Science Contest Junior bal chodachodi koro ?
            </span>
        </v-app-bar>

        <!-- Sizes your content based upon application components -->
        <v-main>

            <!-- Provides the application the proper gutter -->
            <v-container fluid>

                This is view main
            </v-container>
        </v-main>

        <v-footer app>
            This is footer
        </v-footer>
    </v-app>
</template>

<script>
    export default {

        data: () => ({
            drawer: window.innerWidth >= 768,
            group: null,
            problems: [

            ]
        }),

        watch: {

        },

    }
</script>
