import requests

# GitHub GraphQL endpoint
graphql_endpoint = 'https://api.github.com/graphql'

# GitHub personal access token (replace 'YOUR_TOKEN' with your actual token)
token = 'YOUR_TOKEN'

# GraphQL query to fetch top contributors of a repository
query = '''
{
  repository(owner: "OWNER_NAME", name: "REPO_NAME") {
    name
    defaultBranchRef {
      target {
        ... on Commit {
          history(first: 100) {
            edges {
              node {
                author {
                  user {
                    login
                  }
                }
                commitCount
              }
            }
          }
        }
      }
    }
  }
}
'''

# Prepare request headers with authorization token
headers = {
    'Authorization': 'Bearer ' + token
}

# Prepare request data with GraphQL query
data = {
    'query': query
}

# Send POST request to GitHub GraphQL API
response = requests.post(graphql_endpoint, headers=headers, json=data)

# Parse response data
contributors = response.json()['data']['repository']['defaultBranchRef']['target']['history']['edges']

# Sort contributors by commit count in descending order
contributors.sort(key=lambda x: x['node']['commitCount'], reverse=True)

# Print top contributors
print("Top Contributors:")
for contributor in contributors:
    login = contributor['node']['author']['user']['login']
    commit_count = contributor['node']['commitCount']
    print(f"{login}: {commit_count} commits")
