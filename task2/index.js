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
        console.log('responsesssswww', response_payload?.status)
        if (response_payload?.status === 200) {
          console.log('append result elements', response_payload)
          searchResults.innerHTML = '' // Clear previous results
          response_payload?.data?.forEach((result) => {
            // Create and append a table element to searchResults
            const resultTable = document.createElement('table')
            resultTable.className = 'result-table'

            // Create a table row for each result
            const row1 = document.createElement('tr')
            const row2 = document.createElement('tr')
            const row3 = document.createElement('tr')

            // Create table data cells (columns)
            const cell1Label = document.createElement('th')
            cell1Label.textContent = 'First Name'
            const cell2Label = document.createElement('th')
            cell2Label.textContent = 'Last Name'
            const cell3Label = document.createElement('th')
            cell3Label.textContent = 'Email'

            // Create cells to display the data
            const cell1 = document.createElement('td')
            cell1.textContent = result.firstName
            const cell2 = document.createElement('td')
            cell2.textContent = result.sureName
            const cell3 = document.createElement('td')
            cell3.textContent = result.emailaddress

            // Apply CSS styles to the table cells for column separation
            const tableCellStyle = '1px solid #000' // Border style for table cells
            cell1.style.borderRight = tableCellStyle
            cell2.style.borderRight = tableCellStyle
            cell3.style.borderRight = tableCellStyle
            cell1Label.style.borderRight = tableCellStyle
            cell2Label.style.borderRight = tableCellStyle
            cell3Label.style.borderRight = tableCellStyle

            // Append label cells to the first row
            row1.appendChild(cell1Label)
            row1.appendChild(cell2Label)
            row1.appendChild(cell3Label)

            // Append data cells to the second row
            row2.appendChild(cell1)
            row2.appendChild(cell2)
            row2.appendChild(cell3)

            // Append rows to the table
            resultTable.appendChild(row1)
            resultTable.appendChild(row2)

            // Apply CSS styles to center the table and add a border
            resultTable.style.border = '1px solid #000' // Add border
            resultTable.style.margin = '0 auto' // Center the table

            // Append the table to the resultDiv
            const resultDiv = document.createElement('div')
            resultDiv.className = 'result'
            resultDiv.appendChild(resultTable)

            // Append the resultDiv to searchResults
            searchResults.appendChild(resultDiv)
          })
        } else {
          searchResults.textContent = 'No results found.'
        }
      })
      .catch((error) => {
        console.error('Error:', error)
        searchResults.textContent =
          'Sorry, there was a server Error. Please try again later.'
      })
  } catch (error) {
    searchResults.textContent =
      'Sorry, there was a server Error. Please try again later.'
  }
})
