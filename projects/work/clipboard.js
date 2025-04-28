document.querySelectorAll('button').forEach(pre => {
  pre.addEventListener('click', e => {
    const textStore = document.getElementById('textstore')
    textStore.innerHTML = e.target.textContent
    textStore.select()
    textStore.setSelectionRange(0, 99999)
    document.execCommand('copy')

    $('.print').hide().html('메일이 복사되었습니다. 디자이너에게 메일을 보내보세요.').fadeIn(0).delay(1000).fadeOut(0);
    $('#textstore').blur();
  })
})
