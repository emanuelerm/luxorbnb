
import tt from "@tomtom-international/web-sdk-services"

tt.services
  .copyrightsV2({
    key: "6Zdz4adkb3YzaPURg8Zg71KMzMez217G",
  })
  .then(function (results) {
    console.log("Copyrights", results)
  })
  .catch(function (reason) {
    console.log("Copyrights", reason)
  })