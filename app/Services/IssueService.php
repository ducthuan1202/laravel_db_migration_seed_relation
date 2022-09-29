<?php

namespace App\Services;

use App\Repositories\IssueRepository;

final class IssueService
{
    private $issueRepository = null;

    public function __construct(IssueRepository $issueRepository)
    {
        $this->issueRepository = $issueRepository;
    }

    public function index()
    {
        $params = request()->all();
        $issues = $this->issueRepository->findAll($params);
        return response()->json($issues);
    }

    public function create()
    {
        $params = request()->all();
        $issue = $this->issueRepository->create($params);
        return response()->json($issue);
    }

    public function detail($id)
    {
        $issue = $this->issueRepository->findById($id);
        return response()->json($issue);
    }

    public function update($request, $id)
    {
        $params = $request->validated();
        $issue = $this->issueRepository->update($id, $params);
        return response()->json($issue);
    }

    public function delete($id)
    {
        $isDeleted = $this->issueRepository->delete($id);
        return response()->json([
            'success' => $isDeleted,
        ]);
    }
}
