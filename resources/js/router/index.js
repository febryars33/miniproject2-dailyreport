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

// Employees
import EmployeesIndex from '../views/employee/EmployeeIndex.vue'
import EmployeesCreate from '../views/employee/EmployeeCreate.vue'
import EmployeesDetail from '../views/employee/EmployeeDetail.vue'

Vue.use(VueRouter)

const progress_bar_config = [
          {
            call: 'color',
            modifier: 'temp',
            argument: '#0092ee'
          },
          {
            call: 'fail',
            modifier: 'temp',
            argument: '#f83f37'
          },
          {
            call: 'location',
            modifier: 'temp',
            argument: 'top'
          },
          {
            call: 'transition',
            modifier: 'temp',
            argument: {
              speed: '1.5s',
              opacity: '0.6s',
              termination: 300
            }
          }
        ]

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: {
      guest: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/settings',
    name: 'Settings',
    component: Settings,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/settings/change-password',
    name: 'ChangePassword',
    component: ChangePassword,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  // positions
  {
    path: '/positions',
    name: 'PositionsIndex',
    component: PositionsIndex,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/positions/create',
    name: 'PositionsCreate',
    component: PositionsCreate,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/employees',
    name: 'EmployeesIndex',
    component: EmployeesIndex,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/employees/create',
    name: 'EmployeesCreate',
    component: EmployeesCreate,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '/employees/:id',
    name: 'EmployeeDetail',
    component: EmployeesDetail,
    meta: {
      auth: true,
      progress: {
        func: progress_bar_config
      }
    }
  },
  {
    path: '*',
    name: '404',
    component: Error404,
    meta: {
      progress: {
        func: progress_bar_config
      }
    }
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