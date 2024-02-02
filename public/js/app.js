const selectElement = document.getElementById('select_category');

const urlParams = new URLSearchParams(window.location.search);
const categoryParam = urlParams.get('category');

selectElement.addEventListener('change', function(e) {
  const selectedValue = e.target.value;

  if (selectedValue === categoryParam) {
    const option = document.querySelector(`option[value="${selectedValue}"]`);
    option.selected = true;
  }

  if (selectedValue === 'all') {
    const newUrl = '/';
    window.location.href = newUrl;
    return; 
  }

  const newUrl = `/?category=${selectedValue}`;
  window.location.href = newUrl;
});


if (categoryParam) {
  const option = document.querySelector(`option[value="${categoryParam}"]`);
  if (option) {
    option.selected = true;
  }
}
