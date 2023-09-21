document.getElementById('searchForm').addEventListener('submit', function (e) {
  e.preventDefault()
  // geting user search string
  const searchInput = document.getElementById('searchInput').value
  console.log('search string', searchInput)
  
  const searchResults = document.getElementById('searchResults')

  // AJAX request to the index.php file
  try {
    fetch('index.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'searchInput=' + encodeURIComponent(searchInput),
    })
      .then((response) => response.json())
      .then((response_payload) => {
        console.log('responsessss', response_payload?.status)
        if (response_payload?.status === 200) {
            console.log("append result elements",response_payload)
          searchResults.innerHTML = '' // Clear previous results
          response_payload?.data?.forEach((result) => {
              // Create and append result elements (e.g., div, p) to searchResults
              const resultDiv = document.createElement('div')
              resultDiv.className = 'result'
              const firstName = document.createElement('p')
              firstName.textContent = 'First Name: ' + result.firstName
              const sureName = document.createElement('p')
              sureName.textContent = 'Last Name: ' + result.sureName
              const email = document.createElement('p')
              email.textContent = 'Email: ' + result.sureName
              resultDiv.appendChild(firstName)
              resultDiv.appendChild(sureName)
              resultDiv.appendChild(email)
              searchResults.appendChild(resultDiv)
            })
        }
        else{
            searchResults.textContent = 'No results found.'
        }
      })
      .catch((error) => {
        console.error('Error:', error)
        searchResults.textContent = 'Sorry, there was a server Error. Please try again later.'

      })
  } catch (error) {
    searchResults.textContent = 'Sorry, there was a server Error. Please try again later.'
  }
})
