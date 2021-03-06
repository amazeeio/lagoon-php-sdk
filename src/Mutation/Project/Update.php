<?php

namespace Lagoon\Mutation\Project;

use Lagoon\LagoonQueryBase;

/**
 * Update a project using the grpahql api.
 */
class Update extends LagoonQueryBase {

  /**
   * {@inheritdoc}
   */
  protected function expectedKeys() {
    return [
      'id',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function query() {
    return <<<QUERY
mutation UpdateProjectMutation(
  \$id: Int!
  \$name: String
  \$openshift: Int
  \$gitUrl: String
  \$productionEnvironment: String
  \$branches: String
  \$subfolder: String
  \$activeSystemsDeploy: String
  \$activeSystemsRemove: String
  \$activeSystemsTask: String
  \$autoIdle: Int
  \$storageCalc: Int
  \$pullrequests: String
  \$openshiftProjectPattern: String
  \$developmentEnvironmentsLimit: Int
) {
  updateProject(
    input: {
      id: \$id,
      patch: {
        name: \$name,
        openshift: \$openshift,
        gitUrl: \$gitUrl,
        productionEnvironment: \$productionEnvironment,
        branches: \$branches
        subfolder: \$subfolder
        activeSystemsDeploy: \$activeSystemsDeploy
        activeSystemsRemove: \$activeSystemsRemove
        activeSystemsTask: \$activeSystemsTask
        autoIdle: \$autoIdle
        storageCalc: \$storageCalc
        pullrequests: \$pullrequests
        openshiftProjectPattern: \$openshiftProjectPattern
        developmentEnvironmentsLimit: \$developmentEnvironmentsLimit
      }
    }
  ) {
    %s
  }
}
QUERY;
  }
}
