# AffirmationGenerator SDK



Available for [Golang](go/) and [Lua](lua/) and [PHP](php/) and [Python](py/) and [Ruby](rb/) and [TypeScript](ts/).


## Entities

The API exposes one entity:

| Entity | Description | API path |
| --- | --- | --- |
| **GetRandomAffirmation** |  | `/` |

Each entity supports the following operations where available: **load**, **list**, **create**,
**update**, and **remove**.


## Architecture

### Entity-operation model

Every SDK call follows the same pipeline:

1. **Point** — resolve the API endpoint from the operation definition.
2. **Spec** — build the HTTP specification (URL, method, headers, body).
3. **Request** — send the HTTP request.
4. **Response** — receive and parse the response.
5. **Result** — extract the result data for the caller.

At each stage a feature hook fires (e.g. `PrePoint`, `PreSpec`,
`PreRequest`), allowing features to inspect or modify the pipeline.

### Features

Features are hook-based middleware that extend SDK behaviour.

| Feature | Purpose |
| --- | --- |
| **TestFeature** | In-memory mock transport for testing without a live server |

You can add custom features by passing them in the `extend` option at
construction time.

### Direct and Prepare

For endpoints not covered by the entity model, use the low-level methods:

- **`direct(fetchargs)`** — build and send an HTTP request in one step.
- **`prepare(fetchargs)`** — build the request without sending it.

Both accept a map with `path`, `method`, `params`, `query`, `headers`,
and `body`.


## Quick start

### Golang

```go
import sdk "github.com/voxgig-sdk/affirmation-generator-sdk"

client := sdk.NewAffirmationGeneratorSDK(map[string]any{
    "apikey": os.Getenv("AFFIRMATION-GENERATOR_APIKEY"),
})

```

### Lua

```lua
local sdk = require("affirmation-generator_sdk")

local client = sdk.new({
  apikey = os.getenv("AFFIRMATION-GENERATOR_APIKEY"),
})


-- Load a specific getrandomaffirmation
local getrandomaffirmation, err = client:GetRandomAffirmation(nil):load(
  { id = "example_id" }, nil
)
```

### PHP

```php
<?php
require_once 'affirmationgenerator_sdk.php';

$client = new AffirmationGeneratorSDK([
    "apikey" => getenv("AFFIRMATION-GENERATOR_APIKEY"),
]);


// Load a specific getrandomaffirmation
[$getrandomaffirmation, $err] = $client->GetRandomAffirmation(null)->load(
    ["id" => "example_id"], null
);
```

### Python

```python
import os
from affirmationgenerator_sdk import AffirmationGeneratorSDK

client = AffirmationGeneratorSDK({
    "apikey": os.environ.get("AFFIRMATION-GENERATOR_APIKEY"),
})


# Load a specific getrandomaffirmation
getrandomaffirmation, err = client.GetRandomAffirmation(None).load(
    {"id": "example_id"}, None
)
```

### Ruby

```ruby
require_relative "AffirmationGenerator_sdk"

client = AffirmationGeneratorSDK.new({
  "apikey" => ENV["AFFIRMATION-GENERATOR_APIKEY"],
})


# Load a specific getrandomaffirmation
getrandomaffirmation, err = client.GetRandomAffirmation(nil).load(
  { "id" => "example_id" }, nil
)
```

### TypeScript

```ts
import { AffirmationGeneratorSDK } from 'affirmation-generator'

const client = new AffirmationGeneratorSDK({
  apikey: process.env.AFFIRMATION-GENERATOR_APIKEY,
})

```


## Testing

Both SDKs provide a test mode that replaces the HTTP transport with an
in-memory mock, so tests run without a network connection.

### Golang

```go
client := sdk.TestSDK(nil, nil)
result, err := client.GetRandomAffirmation(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
```

### Lua

```lua
local client = sdk.test(nil, nil)
local result, err = client:GetRandomAffirmation(nil):load(
  { id = "test01" }, nil
)
```

### PHP

```php
$client = AffirmationGeneratorSDK::test(null, null);
[$result, $err] = $client->GetRandomAffirmation(null)->load(
    ["id" => "test01"], null
);
```

### Python

```python
client = AffirmationGeneratorSDK.test(None, None)
result, err = client.GetRandomAffirmation(None).load(
    {"id": "test01"}, None
)
```

### Ruby

```ruby
client = AffirmationGeneratorSDK.test(nil, nil)
result, err = client.GetRandomAffirmation(nil).load(
  { "id" => "test01" }, nil
)
```

### TypeScript

```ts
const client = AffirmationGeneratorSDK.test()
const result = await client.GetRandomAffirmation().load({ id: 'test01' })
// result.ok === true, result.data contains mock data
```


## How-to guides

### Make a direct API call

When the entity interface does not cover an endpoint, use `direct`:

**Go:**
```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
```

**Lua:**
```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
```

**PHP:**
```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
```

**Python:**
```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
```

**Ruby:**
```ruby
result, err = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})
```

**TypeScript:**
```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})
console.log(result.data)
```


## Language-specific documentation

- [Golang SDK](go/README.md)
- [Lua SDK](lua/README.md)
- [PHP SDK](php/README.md)
- [Python SDK](py/README.md)
- [Ruby SDK](rb/README.md)
- [TypeScript SDK](ts/README.md)

