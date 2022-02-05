import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

import Home from '../views/Home.vue'
import Error404 from '../views/errors/404.vue'
import Login from '../views/auth/Login.vue'
import Profile from '../views/Profile.vue'
import Settings from '../views/settings/SettingsIndex.vue'
import ChangePassword from '../views/settings/ChangePassword.vue'

// positions
import PositionsIndex from '../views/position/PositionIndex.vue'
import PositionsCreate from '../views/position/PositionCreate.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      auth: true
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: {
      guest: true
    }
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    meta: {
      auth: true
    }
  },
  {
    path: '/settings',
    name: 'Settings',
    component: Settings,
    meta: {
      auth: true
    }
  },
  {
    path: '/settings/change-password',
    name: 'ChangePassword',
    component: ChangePassword,
    meta: {
      auth: true
    }
  },
  // positions
  {
    path: '/positions',
    name: 'PositionsIndex',
    component: PositionsIndex,
    meta: {
      auth: true
    }
  },
  {
    path: '/positions/create',
    name: 'PositionsCreate',
    component: PositionsCreate,
    meta: {
      auth: true
    }
  },
  {
    path: '*',
    name: '404',
    component: Error404
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.auth)) {
    if (store.getters.isLoggedIn && store.getters.user) {
      next()
      return
    }
    next('/login')
  }

  if (to.matched.some(record => record.meta.guest)) {
    if (!store.getters.isLoggedIn) {
      next()
      return
    }
    next('/')
  }

  next()
})

export default router