function notification_status(notification_type) {
  window.sessionStorage.setItem(
    notification_type + '_notification_status',
    'closed'
  )
}
const notification_types = ['info', 'success', 'warning']
document.addEventListener('DOMContentLoaded', (e) => {
  notification_types.forEach((type) => {
    let name = type + '_notification_status'
    if (sessionStorage[name] === 'closed') {
      const elements = document.getElementsByClassName(type)
      for (let index = 0; index < elements.length; index++) {
        const element = elements[index]
        element.classList.add('gov-hidden')
      }
    }
  })
})
